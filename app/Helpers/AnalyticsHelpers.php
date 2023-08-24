<?php

use Google\Analytics\Data\V1beta\Filter;
use Google\Analytics\Data\V1beta\Filter\StringFilter;
use Google\Analytics\Data\V1beta\Filter\StringFilter\MatchType;
use Google\Analytics\Data\V1beta\FilterExpression;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

function fetchActiveUsersByUrl(String $url, Period $period): int {
$dimensionFilter = new FilterExpression([
'filter' => new Filter([
'field_name' => 'pagePath',
'string_filter' => new StringFilter([
'match_type' => MatchType::EXACT,
'value' => $url,
]),
]),
]);

$analyticsData = Analytics::get($period, ['activeUsers'], ['pagePath'], 1, [], 0, $dimensionFilter);

    if (count($analyticsData) === 0) {
        $result = 0;
    } else {
        $result = $analyticsData[0]["activeUsers"];
    }

    return $result;

}
