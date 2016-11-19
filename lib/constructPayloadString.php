<?php
	/*
	 * Copyright (C) 2016 Ryan Shehee
	 *
	 * Author:		Ryan Shehee
	 * Version:		1.03
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
	 * Construct the message payload string from the payload array and attachments array
	 */
	if (!function_exists('constructPayloadString')) {
		function constructPayloadString($payloadArray) {
			/*
			 * Step 1:
			 * Open string
			 */
			$payloadString = '{';
			/*
			 * Step 2:
			 * Append each key and value pair
			 */
			foreach( $payloadArray as $payloadKey => $payloadValue ) {
				if( is_string($payloadValue) ) {
					$payloadKeyCount++;
					if($payloadKeyCount > 1) {
						$payloadString .= ',';
					}
					$payloadString .= '"'.$payloadKey.'":"'.escapePayloadString($payloadValue).'"';
				} elseif( is_array($payloadValue) && $payloadKey === "attachmentsArray" ) {
					/*
					 * Step 3:
					 * Construct and append attachments
					 * Will need to be escaped as needed; see constructAttachmentsString.php for individual escapes
					 */
					$payloadString .= constructAttachmentsString( $payloadArray['attachmentsArray'] );
				}
			}
			/*
			 * Step 4:
			 * Close string
			 */
			$payloadString .= '}';

			return $payloadString;
		}
	}