<?php

namespace App\Enums;

enum EditorialAction: string
{
    case SUBMIT = 'submit';
    case PUBLISH = 'publish';
    case REJECT = 'reject';
    case REVOKE = 'revoke';
    case RETURN = 'return';
    case RESTORE = 'restore';
}
