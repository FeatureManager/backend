# Feature Manager Specifications

We wrote this specification to you deeply understand what is our intention with this tool. So enjoy it!

## Table of Contents

1. [Introduction](#introduction)
2. [Parameters](#parameters)
3. [Features](#features)
    1. [Strategies](#strategies)
4. [Admin](#admin)

## Introduction

**Parameters** are set of data witch are necessary for app works, normally this data are stored in configuration files. Each parameter changes make necessary to access the environment server just to change the file.

**Feature Toggle** is a powerful technique that allows change the apps behavior without even touch the code.

The **Feature Manager** comes to solve this two issues related above.

## Parameters

Parameters are configuration key-pair values and when a key is requested by the client App, the API return the corresponding value.

## Features

Each Feature are composed by a strategy list. This strategies follows an decreasing order when it's called by client App. The list follows until find a positive, if no strategies fits the request, it will return a negative response.

### Strategies

Until now we have 5 (five) types of strategies as follows:

- **Boolean**: This strategy returns true or false against a feature key. Simplifying the feature is On or is Off.

- **Lists**: This strategy returns true or false against a feature key combined with a value list, so if for that feature we have a value list where the value given on request exists on that list the strategy returns true case not it'll return false. A nice example for this type fo strategy is: when an App feature (the resources itself) changes and the test are more complex so turns on the the feature just for a small group of users who will test the feature for a while without the rest of the users being affected.

- **Percentage**: This strategy returns true or false against a feature key combined with 0 to 100 range. The example here is the gradative increase of user quantity who have access to that feature.

- **Periodicals**: This strategy returns true or false against a feature key combined with a period range. Here when we have a maintenance window we can lock that feature to the users.

- **Regex**: This strategy returns true or false against a feature key combined with a Regex expression. This strategy allows you to create workflows based on user e-mail like: "[^@example.com]" or other rule you want. It's pretty flexible.

## Admin

This is the tool that manage the API. With this tool you can:

- **Manage Users**: Create, update, and changes password.
- **Manage Enviroments**: Create and update.
- **Manage Parameters**: Create, update, and viculate to some Environment.
- **Manage Feature**: Create, update, and viculate to some Environment.
- **Manage Strategies**: Create, update and vinculate with some Feature.
- **Audit**: All features, parameters and strategies when change, it will be stored on a log table with date, hour and user who have changed the item.

Created by: @henrisk | Reviewed by: @danilolutz
