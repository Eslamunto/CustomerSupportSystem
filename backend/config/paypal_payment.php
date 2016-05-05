<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => 'AVC7QWUMwoK9ZTGKxSewFLD9rVHTtCckoB_Aba93AZQAn9dH-zsBAIwqz7BJ9p5p5bk3lfGv2_m9SO7g',
		'ClientSecret' => 'EDgF8NON1l3RmJ5qqMumMPv7aylbxjZ7M0Te0TexJNlvsYwxoEN0HYohZY3y8QD2n_hRDDlRkV-CpfAP',
	),

	# Connection Information
	'Http' => array(
		 'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		'EndPoint' => 'https://api.sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		'LogLevel' => 'FINE',
	),
);
