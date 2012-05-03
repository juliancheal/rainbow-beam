$:.unshift File.expand_path('../lib', __FILE__)

require 'rainbowbeam/listener'

run Rainbowbeam::Listener::App