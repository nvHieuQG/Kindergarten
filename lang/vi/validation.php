<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Trường :attribute phải được chấp nhận.',
    'accepted_if'          => 'Trường :attribute phải được chấp nhận khi :other là :value.',
    'active_url'           => 'Trường :attribute không phải là một URL hợp lệ.',
    'after'                => 'Trường :attribute phải là một ngày sau ngày :date.',
    'after_or_equal'       => 'Trường :attribute phải là một ngày sau hoặc bằng ngày :date.',
    'alpha'                => 'Trường :attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash'           => 'Trường :attribute chỉ có thể chứa chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num'            => 'Trường :attribute chỉ có thể chứa chữ cái và số.',
    'array'                => 'Trường :attribute phải là một mảng.',
    'before'               => 'Trường :attribute phải là một ngày trước ngày :date.',
    'before_or_equal'      => 'Trường :attribute phải là một ngày trước hoặc bằng ngày :date.',
    'between'              => [
        'numeric' => 'Trường :attribute phải nằm trong khoảng :min - :max.',
        'file'    => 'Dung lượng tập tin :attribute phải trong khoảng :min - :max kB.',
        'string'  => 'Trường :attribute phải từ :min - :max ký tự.',
        'array'   => 'Trường :attribute phải có từ :min - :max phần tử.',
    ],
    'boolean'              => 'Trường :attribute phải là true hoặc false.',
    'confirmed'            => 'Giá trị xác nhận :attribute không khớp.',
    'current_password'     => 'Mật khẩu không đúng.',
    'date'                 => 'Trường :attribute không phải là ngày hợp lệ.',
    'date_equals'          => 'Trường :attribute phải là một ngày bằng với :date.',
    'date_format'          => 'Trường :attribute không khớp với định dạng :format.',
    'declined'             => 'Trường :attribute phải bị từ chối.',
    'declined_if'          => 'Trường :attribute phải bị từ chối khi :other là :value.',
    'different'            => 'Trường :attribute và :other phải khác nhau.',
    'digits'               => 'Trường :attribute phải có :digits chữ số.',
    'digits_between'       => 'Trường :attribute phải nằm trong khoảng :min - :max chữ số.',
    'dimensions'           => 'Trường :attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => 'Trường :attribute có giá trị trùng lặp.',
    'doesnt_end_with'      => 'Trường :attribute không được kết thúc bằng một trong những giá trị sau: :values.',
    'doesnt_start_with'    => 'Trường :attribute không được bắt đầu bằng một trong những giá trị sau: :values.',
    'email'                => 'Trường :attribute phải là một địa chỉ email hợp lệ.',
    'ends_with'            => 'Trường :attribute phải kết thúc bằng một trong những giá trị sau: :values.',
    'enum'                 => 'Giá trị :attribute đã chọn không hợp lệ.',
    'exists'               => 'Giá trị :attribute đã chọn không hợp lệ.',
    'file'                 => 'Trường :attribute phải là một tệp tin.',
    'filled'               => 'Trường :attribute không được để trống.',
    'gt'                   => [
        'numeric' => 'Trường :attribute phải lớn hơn :value.',
        'file'    => 'Dung lượng tập tin :attribute phải lớn hơn :value kB.',
        'string'  => 'Trường :attribute phải lớn hơn :value ký tự.',
        'array'   => 'Trường :attribute phải có nhiều hơn :value phần tử.',
    ],
    'gte'                  => [
        'numeric' => 'Trường :attribute phải lớn hơn hoặc bằng :value.',
        'file'    => 'Dung lượng tập tin :attribute phải lớn hơn hoặc bằng :value kB.',
        'string'  => 'Trường :attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array'   => 'Trường :attribute phải có ít nhất :value phần tử.',
    ],
    'image'                => 'Trường :attribute phải là định dạng hình ảnh.',
    'in'                   => 'Giá trị :attribute đã chọn không hợp lệ.',
    'in_array'             => 'Trường :attribute không tồn tại trong :other.',
    'integer'              => 'Trường :attribute phải là một số nguyên.',
    'ip'                   => 'Trường :attribute phải là một địa chỉ IP.',
    'ipv4'                 => 'Trường :attribute phải là một địa chỉ IPv4.',
    'ipv6'                 => 'Trường :attribute phải là một địa chỉ IPv6.',
    'json'                 => 'Trường :attribute phải là một chuỗi JSON.',
    'lowercase'            => 'Trường :attribute phải là chữ thường.',
    'lt'                   => [
        'numeric' => 'Trường :attribute phải nhỏ hơn :value.',
        'file'    => 'Dung lượng tập tin :attribute phải nhỏ hơn :value kB.',
        'string'  => 'Trường :attribute phải nhỏ hơn :value ký tự.',
        'array'   => 'Trường :attribute phải có ít hơn :value phần tử.',
    ],
    'lte'                  => [
        'numeric' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value.',
        'file'    => 'Dung lượng tập tin :attribute phải nhỏ hơn hoặc bằng :value kB.',
        'string'  => 'Trường :attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array'   => 'Trường :attribute không được có nhiều hơn :value phần tử.',
    ],
    'mac_address'          => 'Trường :attribute phải là một địa chỉ MAC hợp lệ.',
    'max'                  => [
        'numeric' => 'Trường :attribute không được lớn hơn :max.',
        'file'    => 'Dung lượng tập tin :attribute không được lớn hơn :max kB.',
        'string'  => 'Trường :attribute không được lớn hơn :max ký tự.',
        'array'   => 'Trường :attribute không được có nhiều hơn :max phần tử.',
    ],
    'max_digits'           => 'Trường :attribute không được có nhiều hơn :max chữ số.',
    'mimes'                => 'Trường :attribute phải là một tập tin có định dạng: :values.',
    'mimetypes'            => 'Trường :attribute phải là một tập tin có định dạng: :values.',
    'min'                  => [
        'numeric' => 'Trường :attribute phải tối thiểu là :min.',
        'file'    => 'Dung lượng tập tin :attribute phải tối thiểu là :min kB.',
        'string'  => 'Trường :attribute phải có ít nhất :min ký tự.',
        'array'   => 'Trường :attribute phải có ít nhất :min phần tử.',
    ],
    'min_digits'           => 'Trường :attribute phải có ít nhất :min chữ số.',
    'multiple_of'          => 'Trường :attribute phải là bội số của :value.',
    'not_in'               => 'Giá trị :attribute đã chọn không hợp lệ.',
    'not_regex'            => 'Trường :attribute có định dạng không hợp lệ.',
    'numeric'              => 'Trường :attribute phải là một số.',
    'password'             => [
        'letters' => 'Trường :attribute phải chứa ít nhất một chữ cái.',
        'mixed'   => 'Trường :attribute phải chứa ít nhất một chữ cái in hoa và một chữ cái in thường.',
        'numbers' => 'Trường :attribute phải chứa ít nhất một chữ số.',
        'symbols' => 'Trường :attribute phải chứa ít nhất một ký tự đặc biệt.',
        'uncompromised' => 'Trường :attribute đã xuất hiện trong một vụ rò rỉ dữ liệu. Vui lòng chọn một :attribute khác.',
    ],
    'present'              => 'Trường :attribute phải được cung cấp.',
    'prohibited'           => 'Trường :attribute bị cấm.',
    'prohibited_if'        => 'Trường :attribute bị cấm khi :other là :value.',
    'prohibited_unless'    => 'Trường :attribute bị cấm trừ khi :other là một trong :values.',
    'prohibits'            => 'Trường :attribute cấm :other xuất hiện.',
    'regex'                => 'Trường :attribute có định dạng không hợp lệ.',
    'required'             => 'Trường :attribute không được để trống.',
    'required_array_keys'  => 'Trường :attribute phải chứa các khóa cho: :values.',
    'required_if'          => 'Trường :attribute không được để trống khi :other là :value.',
    'required_if_accepted' => 'Trường :attribute không được để trống khi :other được chấp nhận.',
    'required_unless'      => 'Trường :attribute không được để trống trừ khi :other là :values.',
    'required_with'        => 'Trường :attribute không được để trống khi một trong :values có giá trị.',
    'required_with_all'    => 'Trường :attribute không được để trống khi tất cả :values có giá trị.',
    'required_without'     => 'Trường :attribute không được để trống khi một trong :values không có giá trị.',
    'required_without_all' => 'Trường :attribute không được để trống khi tất cả :values không có giá trị.',
    'same'                 => 'Trường :attribute và :other phải giống nhau.',
    'size'                 => [
        'numeric' => 'Trường :attribute phải bằng :size.',
        'file'    => 'Dung lượng tập tin :attribute phải bằng :size kB.',
        'string'  => 'Trường :attribute phải chứa :size ký tự.',
        'array'   => 'Trường :attribute phải chứa :size phần tử.',
    ],
    'starts_with'          => 'Trường :attribute phải được bắt đầu bằng một trong những giá trị sau: :values.',
    'string'               => 'Trường :attribute phải là một chuỗi.',
    'timezone'             => 'Trường :attribute phải là một múi giờ hợp lệ.',
    'unique'               => 'Trường :attribute đã tồn tại.',
    'uploaded'             => 'Trường :attribute tải lên thất bại.',
    'uppercase'            => 'Trường :attribute phải là chữ in hoa.',
    'url'                  => 'Trường :attribute không giống với định dạng một URL.',
    'uuid'                 => 'Trường :attribute phải là một định dạng UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'title'            => 'tiêu đề',
        'content'          => 'nội dung',
        'excerpt'          => 'tóm tắt',
        'category_id'      => 'danh mục',
        'featured_image'   => 'ảnh đại diện',
        'status'           => 'trạng thái',
        'published_at'     => 'ngày xuất bản',
        'image'            => 'hình ảnh',
        'icon'             => 'biểu tượng',
        'description'      => 'mô tả',
        'hero_image'       => 'ảnh banner',
        'hero_title'       => 'tiêu đề banner',
        'hero_subtitle'    => 'tiêu đề phụ banner',
        'site_name'        => 'tên website',
        'site_address'     => 'địa chỉ',
        'site_phone'       => 'số điện thoại',
        'site_email'       => 'email',
        'parent_name'      => 'tên phụ huynh',
        'parent_phone'     => 'số điện thoại phụ huynh',
        'child_name'       => 'tên bé',
        'child_dob_year'   => 'năm sinh của bé',
        'upload'           => 'tập tin tải lên',
    ],

];
