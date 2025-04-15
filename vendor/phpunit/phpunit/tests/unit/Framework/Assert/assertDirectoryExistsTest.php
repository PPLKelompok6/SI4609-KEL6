<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\TestDox;

#[CoversMethod(Assert::class, 'assertDirectoryExists')]
#[TestDox('assertDirectoryExists()')]
#[Small]
final class assertDirectoryExistsTest extends TestCase
{
    /**
     * @return non-empty-list<array{0: non-empty-string}>
     */
    public static function successProvider(): array
    {
        return [
            [__DIR__],
        ];
    }

    /**
     * @return non-empty-list<array{0: non-empty-string}>
     */
    public static function failureProvider(): array
    {
        return [
            [__DIR__ . '/DoesNotExist'],
        ];
    }

    #[DataProvider('successProvider')]
    public function testSucceedsWhenConstraintEvaluatesToTrue(string $directory): void
    {
        $this->assertDirectoryExists($directory);
    }

    #[DataProvider('failureProvider')]
    public function testFailsWhenConstraintEvaluatesToFalse(string $directory): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->assertDirectoryExists($directory);
    }
}
