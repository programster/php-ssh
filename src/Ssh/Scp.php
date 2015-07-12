<?php

namespace Ssh;

use RuntimeException;

/**
 * Wrapper for ssh2_scp
 *
 * @author Cam Spiers <camspiers@gmail.com>
 * @author Greg Militello <junk@thinkof.net>
 * @author Gildas Quéméner <gildas.quemener@gmail.com>
 * @auther Stuart Page <sdpagent@gmail.com>
 */
class Scp extends Subsystem
{
    protected function createResource()
    {
        $this->resource = $this->getSessionResource();
    }

    
    /**
     * 
     * @param string $local_file
     * @param string $remote_file
     * @param int $create_mode
     * @return type
     */
    public function send($local_file, $remote_file, $create_mode = 0644)
    {
        return ssh2_scp_send( $this->getResource(), $local_file , $remote_file, $create_mode);
    }
    
    
    /**
     * Retrieve a file from a remote system
     * @param string $remote_file
     * @param string $local_file
     * @return bool - true if succeeded, false if not
     */
    public function recv($remote_file, $local_file)
    {
        return ssh2_scp_recv( $this->resource, $remote_file , $local_file);
    }
}
