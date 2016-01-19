<?php

/**
 * BigBlueButton open source conferencing system - http://www.bigbluebutton.org/.
 *
 * Copyright (c) 2016 BigBlueButton Inc. and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * BigBlueButton is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with BigBlueButton; if not, see <http://www.gnu.org/licenses/>.
 */
class GetMeetingInfoResponseTest extends \BigBlueButton\TestCase
{

    /**
     * @var \BigBlueButton\Responses\GetMeetingInfoResponse
     */
    private $meetingInfo;

    public function setUp()
    {
        parent::setUp();

        $xml = simplexml_load_string(file_get_contents((__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'get_meeting_info.xml')));

        $this->meetingInfo = new \BigBlueButton\Responses\GetMeetingInfoResponse($xml);
    }

    public function testGetMeetingInfoResponseContent()
    {
        $this->assertEquals(2, sizeof($this->meetingInfo->getAttendees()));
    }

    public function testGetMeetingInfoResponseTypes(){
        $info = $this->meetingInfo->getMeetingInfo();

        $this->assertTrue(is_string($info->getInternalMeetingId()));
        $this->assertTrue(is_string($info->getModeratorPassword()));
        $this->assertTrue(is_string($info->getAttendeePassword()));
        $this->assertTrue(is_string($info->getCreationDate()));
    }

}
