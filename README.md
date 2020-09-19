# Hyacinth

Hyacinth makes it easy to create HTML with PHP using object-oriented programming.

## Simple Example

```php
echo (new Hyacinth\Elements\Div)->setAttribute('style', 'font-style: italic;')
                                ->addContent('Hello, World!');
                                
// <div style="font-style: italic;">Hello, World!</div>
```

## Advanced Example

```php
$list = (new Hyacinth\Elements\Ul)->addContentArray([
    (new Hyacinth\Elements\Li)->setAttribute('id', 'first-list-item')->addContent('First'),
    (new Hyacinth\Elements\Li)->setAttribute('id', 'second-list-item')->addContent('Second'),
    (new Hyacinth\Elements\Li)->setAttribute('id', 'third-list-item')->addContent('Third')
]);

echo $list;

// <ul><li id="first-list-item"></li><li id="second-list-item"></li><li id="third-list-item"></li></ul>

echo $list->getContent()[0]->getAttributeValue('id');

// first-list-item

```
