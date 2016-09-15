<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */
class PackageControllerTest extends WebTestCase
{
    /**
     * @var String
     */
    public $testAccountSid = 'AC5f37acb24007a320eefb5ffaeb498a78';
    /**
     * @var String
     */
    public $testAccountToken = 'f1dbbb0bbc1b6aa06a5fdcf6d7072d25';

    public function testMakeCall()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/twilio/makeCall',
            [],
            [],
            [],
            '{"args":{"accountSid":"AC5f37acb24007a320eefb5ffaeb498a78","accountToken":"f1dbbb0bbc1b6aa06a5fdcf6d7072d25","from":"+15005550006\'","to":"+380930000895","url":"http://demo.twilio.com/docs/voice.xml"}}'
        );

        $response = $client->getResponse();

        $this->assertJson($response->getContent());
        $data = json_decode($response->getContent(), true);
        $this->assertEquals('success', $data['callback']);
    }

    public function testSendSms()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/twilio/sendSms',
            [],
            [],
            [],
            '{"args":{"accountSid":"AC5f37acb24007a320eefb5ffaeb498a78","accountToken":"f1dbbb0bbc1b6aa06a5fdcf6d7072d25","from":"+15005550006","to":"+380930000895","body":"http://demo.twilio.com/docs/voice.xml"}}'
        );

        $response = $client->getResponse();

        $this->assertJson($response->getContent());
        $data = json_decode($response->getContent(), true);
        $this->assertEquals('success', $data['callback']);
    }

    public function testSendMms()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/twilio/sendMms',
            [],
            [],
            [],
            '{"args":{"accountSid":"AC5f37acb24007a320eefb5ffaeb498a78","accountToken":"f1dbbb0bbc1b6aa06a5fdcf6d7072d25","from":"+15005550006","to":"+380930000895","mediaUrl":"http://demo.twilio.com/docs/voice.xml"}}'
        );

        $response = $client->getResponse();

        $this->assertJson($response->getContent());
        $data = json_decode($response->getContent(), true);
        $this->assertEquals('success', $data['callback']);

    }

    public function testMetadata()
    {
        $client = static::createClient();
        $client->request('GET', '/api/twilio');
        $response = $client->getResponse();

        $data = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('package', $data);
        $this->assertArrayHasKey('tagline', $data);
        $this->assertArrayHasKey('description', $data);
        $this->assertArrayHasKey('image', $data);
        $this->assertArrayHasKey('repo', $data);
        $this->assertArrayHasKey('blocks', $data);
        $this->assertEquals('Twilio', $data['package']);
    }

}