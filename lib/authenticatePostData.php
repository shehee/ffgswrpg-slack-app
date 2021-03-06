<?php
	/*
	 * Copyright (C) 2016 Ryan Shehee
	 *
	 * Author:		Ryan Shehee
	 * Version:		1.07
	 * Date:		2016-11-19
	 * Repository:	https://github.com/shehee/ffgswrpg-slack-app
	 * License:		GNU GPLv3
	 *
	 * Copyright (C) 2016 Ryan Shehee
	 * 
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 * 
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 * 
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 *
	 * Purpose:
	 * --------
	 * Authenticate the $_POST data
	 * If it doesn't authenticate, tell us why
	 */
	if (!function_exists('authenticatePostData')) {
		function authenticatePostData($domainWebhookSettings) {
			if( $_POST['token'] !==  $domainWebhookSettings['roll_token'] ) {
				return "Authentication failed: Token mismatch.";
			} elseif( $_POST['team_id'] !==  $domainWebhookSettings['team_id'] ) {
				return "Authentication failed: Team ID mismatch.";
			} elseif( $_POST['team_domain'] !== $domainWebhookSettings['team_domain'] ) {
				return "Authentication failed: Team domain mismatch.";
			} else {
				return TRUE;
			}
		}
	}