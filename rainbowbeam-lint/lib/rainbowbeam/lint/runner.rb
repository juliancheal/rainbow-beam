require 'json'
require "mongo"
require 'uri'

module Rainbowbeam
  module Lint

    class Runner
      def initialize
        @db = Mongo::Connection.new.db("rainbowbeam")
        @coll = @db.collection("users")
        @valid_fields = %w(api_key timestamp actor verb payload)
      end

      def run(data)
        result = 0
        result += 1 if json_parse(data)
        result += 1 if has_valid_api_key?(data)
        result += 1 if has_valid_fields?(data)
        result += 1 if has_correct_payload?(data)
        result
      end

      protected
      
      def has_correct_payload?(data)
        case data["verb"]
        when "create_project"
          if data["payload"]["name"]
            if data["payload"]["name"].to_s.empty?
              return false
            end
          else
            return false
          end
          if data["payload"]["uri"]
            if uri?(data["payload"]["uri"])
              return true
            else
              return false
            end
          else
            return false
          end
        when "said"
            if data["payload"]["message"]
              if if data["payload"]["message"].to_s.empty?
                return false
              end
            else
              return false
            end
        when "C"
        else
          puts "You just making it up!"
        end
        return true
      end
      
      def has_valid_api_key?(data)
        if @coll.find("api_key" => data['api_key']).to_a.size == 1
          return true
        else
          return false
        end
      end
      
      def has_valid_fields?(data)
        @valid_fields.each do |p|
          if data.member?(p.to_s)
          else
            return false
          end
        end
      end

      def json_parse(data)
        JSON.parse(data.to_json)
      rescue JSON::ParserError
          return false
        # raise JSONError
      end
      
      def validate(issues)
        return Result.new(:invalid, issues) unless issues.empty?
        Result.new(:valid)
      end
      
      def uri?(string)
        uri = URI.parse(string)
        %w( http https ).include?(uri.scheme)
      rescue URI::BadURIError
        false
      rescue URI::InvalidURIError
        false
      end
    end
  end
end