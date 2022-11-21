<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | የ following language lines contain የ default error messages used by
    | የ validator class. Some of these rules have multiple versions such
    | as የ size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'የ :attribute must be accepted.',
    'accepted_if' => 'የ :attribute must be accepted when :other is :value.',
    'active_url' => 'የ :attribute is not a valid URL.',
    'after' => 'የ :attribute must be a date after :date.',
    'after_or_equal' => 'የ :attribute must be a date after or equal to :date.',
    'alpha' => 'የ :attribute must only contain letters.',
    'alpha_dash' => 'የ :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'የ :attribute must only contain letters and numbers.',
    'array' => 'የ :attribute must be an array.',
    'before' => 'የ :attribute must be a date before :date.',
    'before_or_equal' => 'የ :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'የ :attribute must have between :min and :max items.',
        'file' => 'የ :attribute must be between :min and :max kilobytes.',
        'numeric' => 'የ :attribute must be between :min and :max.',
        'string' => 'የ :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'የ :attribute field must be true or false.',
    'confirmed' => 'የ :attribute ማረጋገጫ አይዛመድም።.',
    'current_password' => 'የ password is incorrect.',
    'date' => 'የ :attribute is not a valid date.',
    'date_equals' => 'የ :attribute must be a date equal to :date.',
    'date_format' => 'የ :attribute does not match የ format :format.',
    'declined' => 'የ :attribute must be declined.',
    'declined_if' => 'የ :attribute must be declined when :other is :value.',
    'different' => 'የ :attribute and :other must be different.',
    'digits' => 'የ :attribute must be :digits digits.',
    'digits_between' => 'የ :attribute must be between :min and :max digits.',
    'dimensions' => 'የ :attribute has invalid image dimensions.',
    'distinct' => 'የ :attribute field has a duplicate value.',
    'doesnt_end_with' => 'የ :attribute may not end with one of የ following: :values.',
    'doesnt_start_with' => 'የ :attribute may not start with one of የ following: :values.',
    'email' => 'የ :attribute ትክክለኛ የኢሜይል አድራሻ መሆን አለበት።',
    'ends_with' => 'የ :attribute must end with one of የ following: :values.',
    'enum' => 'የ selected :attribute is invalid.',
    'exists' => 'የ selected :attribute is invalid.',
    'file' => 'የ :attribute ፋይል መሆን አለበት።.',
    'filled' => 'የ :attribute field must have a value.',
    'gt' => [
        'array' => 'የ :attribute must have more than :value items.',
        'file' => 'የ :attribute must be greater than :value kilobytes.',
        'numeric' => 'የ :attribute must be greater than :value.',
        'string' => 'የ :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'የ :attribute must have :value items or more.',
        'file' => 'የ :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'የ :attribute must be greater than or equal to :value.',
        'string' => 'የ :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'የ :attribute ምስል መሆን አለበት.',
    'in' => 'የ selected :attribute is invalid.',
    'in_array' => 'የ :attribute field does not exist in :other.',
    'integer' => 'የ :attribute must be an integer.',
    'ip' => 'የ :attribute must be a valid IP address.',
    'ipv4' => 'የ :attribute must be a valid IPv4 address.',
    'ipv6' => 'የ :attribute must be a valid IPv6 address.',
    'json' => 'የ :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'የ :attribute must have less than :value items.',
        'file' => 'የ :attribute must be less than :value kilobytes.',
        'numeric' => 'የ :attribute must be less than :value.',
        'string' => 'የ :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'የ :attribute must not have more than :value items.',
        'file' => 'የ :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'የ :attribute must be less than or equal to :value.',
        'string' => 'የ :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'የ :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'የ :attribute must not have more than :max items.',
        'file' => 'የ :attribute must not be greater than :max kilobytes.',
        'numeric' => 'የ :attribute must not be greater than :max.',
        'string' => 'የ :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'የ :attribute must not have more than :max digits.',
    'mimes' => 'የ :attribute must be a file of type: :values.',
    'mimetypes' => 'የ :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'የ :attribute must have at least :min items.',
        'file' => 'የ :attribute must be at least :min kilobytes.',
        'numeric' => 'የ :attribute must be at least :min.',
        'string' => 'የ :attribute must be at least :min characters.',
    ],
    'min_digits' => 'የ :attribute must have at least :min digits.',
    'multiple_of' => 'የ :attribute must be a multiple of :value.',
    'not_in' => 'የ selected :attribute is invalid.',
    'not_regex' => 'የ :attribute format is invalid.',
    'numeric' => 'የ :attribute must be a number.',
    'password' => [
        'letters' => 'የ :attribute must contain at least one letter.',
        'mixed' => 'የ :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'የ :attribute must contain at least one number.',
        'symbols' => 'የ :attribute must contain at least one symbol.',
        'uncompromised' => 'የ given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'የ :attribute field must be present.',
    'prohibited' => 'የ :attribute field is prohibited.',
    'prohibited_if' => 'የ :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'የ :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'የ :attribute field prohibits :other from being present.',
    'regex' => 'የ :attribute format is invalid.',
    'required' => 'የ :attribute ቦታ ያስፈልጋል.',
    'required_array_keys' => 'የ :attribute field must contain entries for: :values.',
    'required_if' => 'የ :attribute ቦታ ያስፈልጋል when :other is :value.',
    'required_unless' => 'የ :attribute ቦታ ያስፈልጋል unless :other is in :values.',
    'required_with' => 'የ :attribute ቦታ ያስፈልጋል when :values is present.',
    'required_with_all' => 'የ :attribute ቦታ ያስፈልጋል when :values are present.',
    'required_without' => 'የ :attribute ቦታ ያስፈልጋል when :values is not present.',
    'required_without_all' => 'የ :attribute ቦታ ያስፈልጋል when none of :values are present.',
    'same' => 'የ :attribute እና :other  መመሳሰል አለበት።',
    'size' => [
        'array' => 'የ :attribute must contain :size items.',
        'file' => 'የ :attribute must be :size kilobytes.',
        'numeric' => 'የ :attribute must be :size.',
        'string' => 'የ :attribute must be :size characters.',
    ],
    'starts_with' => 'የ :attribute must start with one of የ following: :values.',
    'string' => 'የ :attribute must be a string.',
    'timezone' => 'የ :attribute must be a valid timezone.',
    'unique' => 'የ :attribute has already been taken.',
    'uploaded' => 'የ :attribute failed to upload.',
    'url' => 'የ :attribute must be a valid URL.',
    'uuid' => 'የ :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name የ lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | የ following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
