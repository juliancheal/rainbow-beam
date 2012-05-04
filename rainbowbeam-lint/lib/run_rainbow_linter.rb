require 'mongo'
require File.expand_path("rainbowbeam/lint")

linter = Rainbowbeam::Lint::Linter.new

linter.validate