# GoogleChart
GoogleCharts for Nette PHP framework

### Installation:
Type

```
composer require spaceboy/google-charts
```

and that's all.

### Using:
In presenter:

```
$this->template->chart = PieChart('chart-id')
  ->setValues([
    ['foo', 100],
    ['bar', 200],
    ['baz', 300],
  ])
  ->setPieHole(0.2)
  ->setTitle('My First Chart');
```

In template:

```
{!$chart->insertApi()}
{* inserts API, required once for HTML document *}

{!$chart->insertChart()}
{* inserts DIV with GoogleChart; required once for each chart *}
```

### Implemented chart types:
* BarChart
* BubbleChart
* ColumnChart
* ComboChart
* DonutChart
* GeoChart
* PieChart
