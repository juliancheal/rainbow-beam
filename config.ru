$:.unshift File.expand_path('../lib', __FILE__)

require 'rubygems'
require 'sinatra/base'
require 'rainbowbeam/listener'

run Rainbowbeam::Listener::App