<?php
require 'blockchain';

// genesis block
if (!$res = addblock('blockchain.dat',
  'September 30, 2016 BBC News: Van Gogh paintings stolen from Amsterdam found in Italy (http://www.bbc.com/news/world-europe-37516164)',
  true)) exit("Got error: ".$res."\n");

// add additional blocks
if (!$res = addblock('blockchain.dat',
  'This is an example of some arbitrary data for block #2'
  )) exit("Got error: ".$res."\n");

// add additional blocks
if (!$res = addblock('blockchain.dat',
  'This text will be stored in the third block'
  )) exit("Got error: ".$res."\n");
		

