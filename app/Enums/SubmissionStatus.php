<?php

namespace App\Enums;

enum SubmissionStatus: string {
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
