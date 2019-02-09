<?php

namespace Tests\Unit;

use Env\Env;
use PHPUnit\Framework\TestCase;

class EnvTest extends TestCase
{
	public function testEnv()
	{
		$envTestFile = __DIR__ . '/.envTest';

		$env = Env::getInstance( $envTestFile );

		$appEnv = preg_replace('/\s+/', ' ', trim($env->getEnv('APP_ENV')));

		$this->assertEquals(
			'local', $appEnv
		);

		$appName = preg_replace('/\s+/', ' ', trim($env->getEnv('APP_NAME')));

		$this->assertEquals(
			'phpenv', $appName
		);

		$this->assertFalse(
			$env->getEnv('NON_EXISTING_VAR')
		);
	}
}
