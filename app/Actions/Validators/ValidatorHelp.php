<?php

namespace App\Actions\Validators;

/**
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class ValidatorHelp
{

    public static function email(): array
    {
        return ['required', 'email', 'string', 'min:3', 'max:50'];
    }

    public static function password(): array
    {
        return [
            'required', 'string', 'min:3', 'max:50',
            self::stripTag()
        ];
    }

    public static function stripTag(): string
    {
        return "regex:/<[sS]cript>/u";
    }

    public static function userName(): string
    {
        return 'regex:/[А-Яа-я]{2,}/u';
    }
}
