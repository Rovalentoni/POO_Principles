# Vehicle Management System

## Overview

This PHP script defines a simple object-oriented hierarchy for managing different types of vehicles. It includes a base `Vehicle` class along with three derived classes: `Car`, `Truck`, and `Motorcycle`.

---

## Table of Contents

- [Classes](#classes)
  - [Vehicle](#vehicle)
  - [Car](#car)
  - [Truck](#truck)
  - [Motorcycle](#motorcycle)
- [How to Use](#how-to-use)
- [Future Improvements](#future-improvements)

---

## Classes

### `Vehicle`

#### Properties

- `maxSpeed`: Maximum speed of the vehicle.
- `currentSpeed`: Current speed of the vehicle.
- `fuelType`: Type of fuel the vehicle uses.

#### Methods

- `__construct($maxSpeed, $fuelType)`: Constructor.
- `accelerate($speed)`: Accelerate the vehicle.
- `brake()`: Brake the vehicle.
- `getCurrentSpeed()`: Get current speed.

---

### `Car` (extends `Vehicle`)

#### Properties

- `numDoors`: Number of doors in the car.
- `maxPassengers`: Maximum number of passengers.
- `currentPassengers`: Current number of passengers.

#### Methods

- `__construct($maxSpeed, $fuelType, $numDoors, $maxPassengers)`: Constructor.
- `boardPassengers($numPassengers)`: Board passengers.

---

### `Truck` (extends `Car`)

#### Properties

- `loadCapacity`: Load capacity of the truck.
- `numWheels`: Number of wheels on the truck.

#### Methods

- `__construct($maxSpeed, $fuelType, $numWheels, $numDoors, $loadCapacity, $maxPassengers)`: Constructor.
- `loadCargo($weight)`: Load cargo.

---

### `Motorcycle` (extends `Vehicle`)

#### Properties

- `numSaddlebags`: Current number of saddlebags.
- `maxSaddlebags`: Maximum number of saddlebags.

#### Methods

- `__construct($maxSpeed, $fuelType, $maxSaddlebags)`: Constructor.
- `addSaddlebag($count)`: Add saddlebags.

---

## How to Use

1. Include this file in your PHP project.
2. Create instances of each class as needed.
3. Use class methods to interact with the objects.

**Example:**

```php
$car = new Car(120, "Petrol", 4, 5);
$car->boardPassengers(3);
