<?php

function formatDuration($seconds)
{
    $minutes = floor($seconds / 60);
    $remainingSeconds = $seconds % 60;
    return "{$minutes}m {$remainingSeconds}s";
}
