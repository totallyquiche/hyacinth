# Hyacinth

Hyacinth makes it easy to create HTML with PHP using object-oriented programming.

**By the way, don't use this!**

I created Hyacinth for fun. There are a lot of these types of projects floating around, but writing HTML with PHP is _messy_ and tightly couples the frontend and backend. If this library seems appealing, you may need to reconsider your app's architecture.

Instead, consider using a template system to handle your HTML.

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

// <ul><li id="first-list-item">First</li><li id="second-list-item">Second</li><li id="third-list-item">Third</li></ul>

echo $list->getContent()[0]->getAttributeValue('id');

// first-list-item

```
