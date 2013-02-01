<?php

require_once ('format.php');

function JsBeautify($file)
{
	var_dump($file);
	var_dump(file_get_contents($file));

	return Formatter::formatJavascript(file_get_contents($file));
}

// run it as a command line tool
$argc = $_SERVER['argc'];
$argv = $_SERVER['argv'];

if ($argc < 2)
{
	printf("Usage: %s input file [output file]\n" . "Input file can be '-' for stdin, " .
			"and output can be '_' for same as input.\n\n",
		$argv[0]);
	exit(0);
}

$out = JsBeautify($argv[1] == '-' ? 'php://stdin' : $argv[1]);
if ($argc > 2)
	file_put_contents($argv[2] = '_' ? $argv[1] : $argv[2], $out);
else
	echo $out;
