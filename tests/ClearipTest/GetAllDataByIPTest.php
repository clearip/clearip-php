<?php
use Clearip\IPInfoApi;

class SampleTest extends PHPUnit_Framework_TestCase
{
    public function testGetAllDataByIP()
    {
        $clearIPClientStub = $this->getMockBuilder('Clearip\Client')->disableOriginalConstructor()->getMock();

        $fakeHttpClient = $this->getMockBuilder('\Clearip\HttpClient')
            ->setConstructorArgs(array('fake api key'))
            ->getMock();

        $fakeHttpClient->expects($this->once())
            ->method('get')
            ->will($this->returnValue("{\"country\":\"United States\",\"continent\":\"Americas\",\"country_falg\":\"\uD83C\uDDFA\uD83C\uDDF8\",\"CountryCode\":\"US\",\"City\":\"Ashburn\",\"Region\":\"Virginia\",\"lat\":39.0481,\"lng\":-77.4728,\"tz\":\"America\/New_York\",\"isp\":\"Amazon\",\"is_anonymous_proxy\":false,\"is_satellite_provider\":false,\"currency\":[\"USD\",\"USN\",\"USS\"],\"country_details\":{\"name\":{\"common\":\"United States\",\"official\":\"United States of America\",\"Native\":{\"eng\":{\"common\":\"United States\",\"official\":\"United States of America\"}}},\"EuMember\":false,\"LandLocked\":false,\"Nationality\":\"\",\"tld\":[\".us\"],\"Languages\":{\"eng\":\"English\"},\"Translations\":{\"FRA\":{\"common\":\"\u00C9tats-Unis\",\"official\":\"Les \u00E9tats-unis d'Am\u00E9rique\"},\"HRV\":{\"common\":\"Sjedinjene Ameri\u010Dke Dr\u017Eave\",\"official\":\"Sjedinjene Dr\u017Eave Amerike\"},\"ITA\":{\"common\":\"Stati Uniti d'America\",\"official\":\"Stati Uniti d'America\"},\"JPN\":{\"common\":\"\u30A2\u30E1\u30EA\u30AB\u5408\u8846\u56FD\",\"official\":\"\u30A2\u30E1\u30EA\u30AB\u5408\u8846\u56FD\"},\"NLD\":{\"common\":\"Verenigde Staten\",\"official\":\"Verenigde Staten van Amerika\"},\"RUS\":{\"common\":\"\u0421\u043E\u0435DEU\u0434\u0438\u043D\u0451\u043D\u043D\u044B\u0435 \u0428\u0442\u0430\u0442\u044B \u0410\u043C\u0435\u0440\u0438\u043A\u0438\",\"official\":\"\u0421\u043E\u0435\u0434\u0438\u043D\u0435\u043D\u043D\u044B\u0435 \u0428\u0442\u0430\u0442\u044B \u0410\u043C\u0435\u0440\u0438\u043A\u0438\"},\"SPA\":{\"common\":\"Estados Unidos\",\"official\":\"Estados Unidos de Am\u00E9rica\"}},\"currency\":[\"USD\",\"USN\",\"USS\"],\"Borders\":[\"CAN\",\"MEX\"],\"cca2\":\"US\",\"cca3\":\"USA\",\"CIOC\":\"USA\",\"CCN3\":\"840\",\"callingCode\":[\"1\"],\"InternationalPrefix\":\"011\",\"region\":\"Americas\",\"subregion\":\"Northern America\",\"Continent\":\"North America\",\"capital\":\"Washington D.C.\",\"Area\":9372610,\"longitude\":\"97 00 W\",\"latitude\":\"38 00 N\",\"MinLongitude\":-179.23108,\"MinLatitude\":17.831509,\"MaxLongitude\":-66.885414,\"MaxLatitude\":71.441055,\"Latitude\":39.443256,\"Longitude\":-98.95734}}"));

        $clearIPClientStub->IPInfoApi = new IPInfoApi($fakeHttpClient);
        $response = $clearIPClientStub->IPInfoApi->GetAllDataByIP('192.168.1.1');

        $this->assertEquals('United States', $response->country);
    }
}
