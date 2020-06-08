Feature: Generate Random chupi format json
    Scenario: Valid response JSON format
        When I send a "GET" request to "/chupi_json"
        Then the response status code should be 200
        And the response should be in JSON

    Scenario: Check have the color random
        When I send a "GET" request to "/chupi_json"
        Then the response content should be color valid

    Scenario: check have the cool word response JSON format
        When I send a "GET" request to "/chupi_json"
        Then the response status code should be 200
        And the response content should be cool word valid

    Scenario: check have the background color response JSON format
        When I send a "GET" request to "/chupi_json"
        Then the response status code should be 200
        And the response content should be color valid

    Scenario: Generate Random chupi format json
        When I send a "GET" request to "/chupi_json"
        Then the response status code should be 200
        And the response content should be json format whith "textColor", "coolWord" and "bgColor"