# PHP Collections

[![Build Status](https://travis-ci.org/epfremmer/collections.svg)](https://travis-ci.org/epfremmer/collections?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/epfremmer/collections/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/epfremmer/collections/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/epfremmer/collections/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/epfremmer/collections/?branch=master)

## Overview

This library was intended to provide base PHP collection classes that can be extended to provide 
application specific functionality.

There are 3 main collection classes provided by default:

* BaseCollection - This is a basic iterable collection very similar in capabilities to ArrayObject
* Collection - An extension of BaseCollection with added methods for conventional array access & modifications
* ImmutableCollection - Another extension of BaseCollection but with all remove/write capabilities disabled

The primary components of each collection is also included as PHP traits to assist in the creation of
any custom collection classes that can't simply extend one of the included collection class objects. Each of
the traits included is designed to meet SPL Traversable Interface methods. Each trait has the expectation that 
the class using it can access an $elements member variable on the collection class.

### Collection Traits

* ArrayAccessTrait - Satisfies SPL ArrayAccess Interface
* ClearableTrait - Adds methods to clear and test emptiness of collections
* CountableTrait - Satisfies SPL Countable Interface
* IterableTrait - Satisfies SPL Iterator Interface
* SearchableTrait - Adds methods to better search & filter collections
* SeekableTrait - Satisfies SPL SeekableIterator Interface (also requires IterableTrait)

## Installation

* `composer require epfremme/collections`
* `composer install`
