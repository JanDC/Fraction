# Fraction
PHP Class representing a rational number as a fraction (as opposed to a floating point value)


see also https://en.wikipedia.org/wiki/Floating_point#Accuracy_problems

###Typical example in which floating points go horribly wrong: product discounts!

#### Safe example (with precision=2)
 - ProductA costs 99.99 euros (9999/100)
 - Vat is 21% (increase of 121/100)
 - Coupon discount of 20%  (increase of 80/100)

Total is 96.79 euros (float) or 96790320/1000000 euros (unresolved fraction, which is 96.79 rounded with precision 2)

#### Bad example (with precision=2)
 - ProductA costs 99.99 euros (9999/100)
 - Vat is 21% (increase by 121/100)
 - Coupon discount of one third (increase of 2/3)

Total is 81.06 euros (float) or 2419758/30000 euros in fraction (in p2 = 80.66 euros!)

In this last example, there is a whopping 40 cents difference on only one product.
That said a precision of 2 is pretty low, so we could increase precision to close the gap...

<table>
<tr><th>Precision</th><th>Pure floating point</th><th>Resolved fraction</th><th>diff</th></tr>
<tr><td>2</td><td>81.06</td><td>80.66</td><td>+0.40</td></tr>
<tr><td>3</td><td>80.699</td><td>80.659</td><td>+0.040</td></tr>
<tr><td>5</td><td>80.659</td><td>80.6586</td><td>+0.0004</td></tr>
<tr><td>10</td><td>80.658600004</td><td>80.6586</td><td>+0.000000004</td></tr>
<tr><td>14</td><td>80.6586</td><td>80.6586</td><td>0</td></tr>
</table>


#### If you need a precision of 14 or more just to properly determine the price of one product, you're wasting your computing and/or storage resources!!
