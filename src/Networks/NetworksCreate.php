<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Manager;

class NetworksCreate extends Manager
{
    protected array $body = [
        'Name' => null,
        'CheckDuplicate' => null,
        'Driver' => 'bridge',
        'Internal' => null,
        'Attachable' => null,
        'Ingress' => null,
        'IPAM' => null,
        'EnableIPv6' => null,
        'Options' => null,
        'Labels' => null
    ];

    public function setName(string $value): self
    {
        $this->body['Name'] = $value;
        return $this;
    }

    public function setCheckDuplicate(bool $value): self
    {
        $this->body['CheckDuplicate'] = $value;
        return $this;
    }

    public function setDriver(string $value): self
    {
        $this->body['Driver'] = $value;
        return $this;
    }

    public function setInternal(bool $value): self
    {
        $this->body['Internal'] = $value;
        return $this;
    }

    public function setAttachable(bool $value): self
    {
        $this->body['Attachable'] = $value;
        return $this;
    }

    public function setIngress(bool $value): self
    {
        $this->body['Ingress'] = $value;
        return $this;
    }

    public function setIPAM(array $value): self
    {
        $this->body['IPAM'] = $value;
        return $this;
    }

    public function setEnableIPv6(bool $value): self
    {
        $this->body['EnableIPv6'] = $value;
        return $this;
    }

    public function setOptions(array $value): self
    {
        $this->body['Options'] = $value;
        return $this;
    }

    public function setLabels(array $value): self
    {
        $this->body['Labels'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'networks/create')
            ->toArray();
    }
}