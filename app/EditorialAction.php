<?php

namespace App;

enum EditorialAction: string
{
    case PENDING = 'pending';
    case PUBLISHED = 'published';
    case REJECTED = 'rejected';
    case REVOKED = 'revoked';
    case RETURNED = 'returned';
    case RESTORED = 'restored';
}
