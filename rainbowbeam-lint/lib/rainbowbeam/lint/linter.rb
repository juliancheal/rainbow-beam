require 'mongo'
require 'yaml'
require 'pusher'

module Rainbowbeam
  module Lint
    class Linter
      def initialize
        @db = Mongo::Connection.new.db("activity")
        @publish = @db.collection("publish")
        @stream = @db.collection("stream")
        
        @runner = Rainbowbeam::Lint::Runner.new
        
        yml = YAML::load(File.open('../config.yml'))
        puts yml
        puts yml["pusher"]["app_id"]
        
        Pusher.app_id = yml["pusher"]["app_id"]
        Pusher.key = yml["pusher"]["key"]
        Pusher.secret = yml["pusher"]["secret"]
      end
      
      def validate
        @publish.find.each do |row|
          result = @runner.run(row)
          update_data(row,result)
        end
      end
      
      def update_data(row,result)
        if result == 4
          @stream.insert(row)
          # push_all_the_updates(row)
        end
        # @publish.remove(row)
      end
      
      def push_all_the_updates(row)
        Pusher['my-channel'].trigger('my-event', {:message => "#{row}"})
      end
    end
  end
end