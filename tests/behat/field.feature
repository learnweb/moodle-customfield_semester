@customfield @customfield_semester @javascript
Feature: Managers can manage course custom fields semester
  In order to have additional data on the course
  As a manager
  I need to create, edit, remove and sort custom fields

  Background:
    Given the following "custom field categories" exist:
      | name              | component   | area   | itemid |
      | Category for test | core_course | course | 0      |
    And I log in as "admin"
    And I navigate to "Courses > Default settings > Course custom fields" in site administration

  Scenario: Create a custom course semester field
    When I click on "Add a new custom field" "link"
    And I click on "Semester field" "link"
    And I set the following fields to these values:
      | Name       | Test field |
      | Short name | testfield  |
    And I click on "Save changes" "button" in the "Adding a new Semester field" "dialogue"
    Then I should see "Test field"
    And I log out

  Scenario: Edit a custom course semester field
    When I click on "Add a new custom field" "link"
    And I click on "Semester field" "link"
    And I set the following fields to these values:
      | Name       | Test field |
      | Short name | testfield  |
    And I click on "Save changes" "button" in the "Adding a new Semester field" "dialogue"
    And I click on "Edit" "link" in the "Test field" "table_row"
    And I set the following fields to these values:
      | Name | Edited field |
    And I click on "Save changes" "button" in the "Updating Test field" "dialogue"
    Then I should see "Edited field"
    And I should not see "Test field"
    And I log out

  Scenario: Delete a custom course semester field
    When I click on "Add a new custom field" "link"
    And I click on "Semester field" "link"
    And I set the following fields to these values:
      | Name       | Test field |
      | Short name | testfield  |
    And I click on "Save changes" "button" in the "Adding a new Semester field" "dialogue"
    And I click on "Delete" "link" in the "Test field" "table_row"
    And I click on "Yes" "button" in the "Confirm" "dialogue"
    Then I should not see "Test field"
    And I log out

  Scenario: Validation of custom course select field configuration
    When I click on "Add a new custom field" "link"
    And I click on "Semester field" "link"
    And I set the following fields to these values:
      | Name       | Test field |
      | Short name | not right  |
    And I click on "Save changes" "button" in the "Adding a new Semester field" "dialogue"
    And I should see "The short name can only contain alphanumeric lowercase characters and underscores (_)."
    And I set the following fields to these values:
      | Short name | correctname  |
    And I click on "Save changes" "button" in the "Adding a new Semester field" "dialogue"
    Then I should see "correctname"
    And I log out
