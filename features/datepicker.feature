Feature: Calculate the age of a person in number of hours using their date of birth
  So that I can impress my friends
  As a web user
  I wish to find out my age accurate to number of hours

  Scenario: Calculate the age in number of hours of a normal person
    Given I am on the homepage
    And I specify that my name is "Ryu"
    And I specify that my date of birth is the "21" of "Jul" "1964"
    When I ask for my age in number of hours to be calculated
    Then I should be told how old I am