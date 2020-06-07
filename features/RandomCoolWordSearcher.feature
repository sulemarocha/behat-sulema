Feature: Generate Random cool word
    Scenario: Generate Random cool word
        When I send a "GET" request to "/cool word"
        Then the response status code should be 200
        And the response content should be: "Holiiiiii"