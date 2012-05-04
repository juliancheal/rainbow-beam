require 'mongo'
require File.expand_path("rainbowbeam/lint")
# require 'lib/rainbowbeam/lint'

linter = Rainbowbeam::Lint::Linter.new

linter.validate