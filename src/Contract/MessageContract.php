<?php

namespace PushNotification\Contract;

interface MessageContract
{

    public function fill(array $options);

    public function render();
}