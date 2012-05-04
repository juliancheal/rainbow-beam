require 'mongo'

module Rainbowbeam
  module Lint
    class Linter
      def initialize
        @db = Mongo::Connection.new.db("activity")
        @publish = @db.collection("publish")
        @stream = @db.collection("stream")
        
        @runner = Rainbowbeam::Lint::Runner.new
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
        end
        @publish.remove(row)
      end
    end
  end
end