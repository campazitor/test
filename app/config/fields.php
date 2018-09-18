<?php

    /**
     * array of database fields
     * write mask - '{field_name_in_database}/{field_type} => {field_name_in_the_table_header_on_the_site}'
     * type of field can only be - int, string
     *
     * Also here is the order of filling the table and form fields
     */

    return [
        'rank/int'          => 'Рейтинг',
        'name/string'       => 'Имя',
        'secondname/string' => 'Фамилия',
];