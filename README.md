perch2-fieldtypes-customlist
============================

The custom-content data-select field lets you add a selection box in your templates and populate them with data from arbitrary pairs of columns from perch's database tables.


Installation
------------

Copy the contents of the `fieldtypes` directory from the repository into your `perch/addons/fieldtypes` directory.


Usage
-----

Use the following tag in your content templates:

    <perch:content type="customlist" page="<namespace>" region="<collection>" options="<labelsColumn>" values="<valuesColumn>" />

plus the standard tag attributes (*id*, *suppress*, etc.). This will show as a selection box inside
the administration backend. The box will be populated with options read from the `[PERCH_DB_PREFIX]<namespace>_<collection>` table inside the perch database. The option value will be read from the `<valuesColumn>` table column, while the option label from `<labelsColumn>`. The option's value will be output to the rendered template.

---

**For instance**, if you want the user to be able to select a category from the shop app, you can write the following tag:

    <perch:content id="category" type="customlist" label="Select category"
                   page="shop" region="categories" options="categoryTitle" values="categorySlug"/>

The rule of thumb, if you don't want to wade through database tables to figure out the attribute values, is:

1. Use the app name as the *page*
2. Use the singular entity name as the *region*
3. Use the predefined tag ids defined by the app to that entity

---

If the `values` attribute is missing the value from `options` will be used both for the option's value and label.

The attribute names are purposedly copied from the perch standard *dataselect* tag, as I would like to make this fieldtype work as a transparent replacement for it, reverting to the standard page-content selection as a fallback case.


Roadmap
-------

One interesting feature to add would be the possibility to repeat the tag with the same attribute and different column names to extract other predefined or user-defined content from the selected entity.

Also add basic filtering of options à la *perch_ * _custom()* functions.

**Contributions are welcome**
