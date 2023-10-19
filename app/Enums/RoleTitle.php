<?php

namespace App\Enums;

enum RoleTitle: string
{
    case ADMIN = 'Admin';
    case TEAM_LEADER = 'Team Leader';
    case SALES_AGENT = 'Sales Agent';
    case ACCOUNT_MANAGER = 'Account Manager';
    case UNDERWRITER = 'Underwriter';
    case CLAIMS_ADJUSTER = 'Claims Adjuster';
    case RISK_MANAGER = 'Risk Manager';
}
