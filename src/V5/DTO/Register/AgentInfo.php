<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class AgentInfo
{
    /**
     * @var AgentType
     *
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V5\DTO\Register\AgentType'>")
     */
    private $type;

    /**
     * @var PayingAgent|null
     *
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Register\PayingAgent")
     */
    private $payingAgent;

    /**
     * @var ReceivePaymentsOperator|null
     *
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Register\ReceivePaymentsOperator")
     */
    private $receivePaymentsOperator;

    /**
     * @var MoneyTransferOperator|null
     *
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Register\MoneyTransferOperator")
     */
    private $moneyTransferOperator;

    public function __construct(AgentType $type)
    {
        $this->type = $type;
    }

    public function getType(): AgentType
    {
        return $this->type;
    }

    public function setType(AgentType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPayingAgent(): ?PayingAgent
    {
        return $this->payingAgent;
    }

    public function setPayingAgent(?PayingAgent $payingAgent): self
    {
        $this->payingAgent = $payingAgent;

        return $this;
    }

    public function getReceivePaymentsOperator(): ?ReceivePaymentsOperator
    {
        return $this->receivePaymentsOperator;
    }

    public function setReceivePaymentsOperator(?ReceivePaymentsOperator $receivePaymentsOperator): self
    {
        $this->receivePaymentsOperator = $receivePaymentsOperator;

        return $this;
    }

    public function getMoneyTransferOperator(): ?MoneyTransferOperator
    {
        return $this->moneyTransferOperator;
    }

    public function setMoneyTransferOperator(?MoneyTransferOperator $moneyTransferOperator): self
    {
        $this->moneyTransferOperator = $moneyTransferOperator;

        return $this;
    }
}
