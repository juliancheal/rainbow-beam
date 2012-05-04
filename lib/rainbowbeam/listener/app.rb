require 'sinatra/base'
require 'mongo'
require 'json'

module Rainbowbeam
  module Listener
    class App < Sinatra::Base

      $db = Mongo::Connection.new.db("activity")
      
      post '/' do
        # info "Handling ping for #{credentials.inspect}"
        # requests.publish(data, :type => 'request')
        # debug "Request created : #{payload.inspect}"
        # 204
        # params[:json]
        data = JSON.parse(params[:data])
        publish(data)
        203
      end
      
      get '/' do
        # info "Handling ping for #{credentials.inspect}"
        # requests.publish(data, :type => 'request')
        # debug "Request created : #{payload.inspect}"
        # 204
        # data
      end

      protected

      def publish(data)
        # @requests ||= Travis::Amqp::Publisher.builds('builds.requests')
        coll = $db["publish"]
        coll.insert(data)
      end
    end
  end
end
