#!/usr/bin/php

<?php
mb_internal_encoding("UTF-8");
$connection = ssh2_connect('x.x.x.x', 22);
ssh2_auth_password($connection, 'user', 'pass');
#$stream = ssh2_exec($connection, '/etc/init.d/quagga start | screen bash /gost-ssl/rzs/rkn.sh');
$stream = ssh2_exec($connection, 'screen bash /gost-ssl/rzs/rkn.sh', $pty="vt100");
stream_set_blocking($stream, true);
$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
$out= stream_get_contents($stream_out);
print $out;


?>

