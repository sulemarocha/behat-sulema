Feature: Generate Random color
    Scenario: Generate Random color
        When I send a "GET" request to "/color"
        Then the response status code should be 200
        And the response content should be a color random