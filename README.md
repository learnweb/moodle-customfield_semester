# customfield_semester

Adds a Semester customfield type to moodle.

Choosable options for a semester customfield are a  list of semesters and the `"semesterindependent"` option.

Exactly which semesters are choosable are defined by these three options:

- The year, in which the list of semesters begins.
    - Default value: `2007`
- An amount of months, that affects how many future semesters are added as options.
For example, if you choose 9 months, all semesters that begin in the next 9 months (from whenever the semester menu is being viewed) are selectable additionally to all past ones.
    - Default value: `6`
- An amount of months, that affects which semester is selected as default.
For example, if you choose 3 months, the default selection is the semester that will be in progress 3 months from whenever the semester menu is being viewed.
    - Default value: `3`