# require 'rainbowbeam/lint/linter'
# require 'rainbowbeam/lint/linter'
# require 'rainbowbeam/lint/runner'
# require 'rainbowbeam/lint/errors'

Dir[File.join(".", "**/*.rb")].each do |f|
   require f
 end