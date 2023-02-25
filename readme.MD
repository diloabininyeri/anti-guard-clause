### Anti guard clause
I will not tell you what a guard clause is, those who want can research what it is, this library is written to prevent guard clause formation.


>for install with composer 

```console
composer require zeus/anti-guard-clause
```
#### The using 
An Example of the anti-guard clause

let's create a some class
>Age class
```php
use Zues\Less\IfInterface;

readonly class Age implements IfInterface
{

    public function __construct(private int $age)
    {
    }

    /**
     * @return mixed
     */
    public function make(): mixed
    {
        return 'age must be greater than 18';
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return  18<=$this->age;
    }
}

```
>The Man class
```php
use Zues\Less\IfInterface;

readonly class Man implements IfInterface
{


    public function __construct(private string $gender)
    {
    }
    
    public function make(): string
    {
        return 'gender must be a man';
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return $this->gender === 'man';
    }
}
```
let's create e default class for else 

```php
use Zues\Less\ElseInterface;

readonly class ElseGender implements ElseInterface
{

    /**
     * @return mixed
     */
    public function make(): string
    {
        return 'else condition';
    }
}
```
and using it 
```php

$gender = 'man';
$age = 16;

$condition = new Condition();
 $condition
    ->if(new Age($age))
    ->ifNot(new Man($gender))
    ->else(new ElseGender());
            
echo $condition->getMake(); //get Result           

```
