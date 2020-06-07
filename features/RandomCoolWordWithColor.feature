Feature: Generate Random chupi format json
    Scenario: Generate Random chupi format json
        When I send a "GET" request to "/chupi_json"
        Then the response status code should be 200
        And the response content should be:
        """
            {
                "textColor": "magenta",
                "coolWord": "Besiis",
                "bgColor": "green"
            }
        """