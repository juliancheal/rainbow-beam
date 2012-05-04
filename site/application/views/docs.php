<div class="page-header">
  <h1>Documentation <small>For all you cool kids</small></h1>
</div>

<p>If you're here then you probably want to tell Rainbow Beam whenever something happens in your application, or tell your application when something happens on Rainbow Beam. Before you get around to this, if you don't understand all of the following then you'll probably either want to find somebody who does, or do some background reading.</p>

<ul>
	<li>HTTP GET</li>
	<li>HTTP POST</li>
	<li>HTTP Basic Authentication</li>
	<li>JSON</li>
</ul>

<h2>Telling Us About Events</h2>

<p>Before you can send us anything you'll need an application ID and an application API key. To get these, check the project README and hit up a team member.</p>

<h3>POST us something!</h3>

<p>We have a simple endpoint for all incoming event notifications. You need to send a <code>HTTP POST</code> request to the following URL:

<pre>
http://rainbowbeam.lncd.org/activity
</pre>

<p>You will also need to provide your application ID as the HTTP Authorization username, and your API key as the HTTP Authorization password. If you don't then you'll receive a <code>HTTP 401</code> response and a stern telling off.</p>

<h4>Le Body</h4>

<p>Your <code>POST</code> request needs to contain a JSON body with the following structure. If you really want then you can send us even more, but it'll be thrown away so there's not much point.</p>

<pre>
{
	"timestamp": int	// A Unix timestamp (UTC please) relating to the date and time of the event.
	"actor": string	// The URI of the actor which is performing the action.
	"verb": string	// One of our verbs.
	"payload": array	// An array of information as required by the verb being used.
}
</pre>

<p>You'll probably want to check out our <a href="#verbs">list of verbs</a> for information on valid verbs and payloads.</p>

<h4>Le Response</h4>

<p>If things have gone well and your message is queued for processing and dissemination we'll send you a <code>HTTP 202</code> response code. If you receive a <code>HTTP 400</code> then you've done something wrong (most likely sent us invalid JSON) and the error message will tell you more. If you receive a <code>HTTP 500</code> then something has gone catastrophically wrong at our end, and we apologise.</p>

<h3 id="verbs">Verbs</h3>

<p>The following are valid verbs and their expected payloads. If you send an invalid verb, or an invalid payload for that verb, you will still receive a <code>HTTP 202</code> response code but your event will not appear in the stream.</p>

<?php

foreach ($verbs as $verb){
	
	echo '<h4>' . $verb['name'] . '</h4>
	<pre>
payload: {';
	
	foreach ($verb['payload'] as $payload)
	{
		echo '
	' . $payload['name'] . ': ' . $payload['type'] . '	// ' . $payload['description'];
	}
	
	echo '
}
</pre>';
}

?>