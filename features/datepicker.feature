Feature: Calculate the age of a person in number of hours using their date of birth
  So that I can impress my friends
  As a web user
  I wish to find out my age accurate to number of hours

  Scenario Outline: Calculate the age in number of hours of a normal person
    Given I am on the homepage
    And I specify that my name is <name>
    And I specify that my date of birth is the <day> of <month> <year>
    When I ask for my age in number of hours to be calculated
    Then I should be told how old I am

    Examples:
      | name       | day | month | year |
      | "Ryu"      | 21  | Jul   | 1964 |
      | "Ken"      | 14  | Feb   | 1965 |
      | "Chun-Li"  | 1   | Mar   | 1968 |
      | "E. Honda" | 3   | Nov   | 1960 |