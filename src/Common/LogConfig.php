<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class LogConfig
{
    /**
     * @var array
     */
    private array $body = [];

    /**
     * "json-file""syslog""journald""gelf""fluentd""awslogs""splunk""etwlogs""none"
     * @param string $value
     */
    public function setType(string $value): void
    {
        $this->body['Type'] = $value;
    }

    /**
     * Config
     * @param array $value
     */
    public function setConfig(array $value): void
    {
        $this->body['Config'] = $value;
    }

    /**
     * LogConfig value
     * @return array
     */
    public function valueOf(): array
    {
        return $this->body;
    }
}