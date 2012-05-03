$:.unshift File.expand_path('../lib', __FILE__)

require 'rubygems'
require 'sinatra/base'
require 'bundler'

Bundler.require

require 'rainbowbeam/listener'

run Rainbowbeam::Listener::App